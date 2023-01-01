<?php

namespace AlahramGroup\SharedModels\User;

use App\Services\Platform;
use Illuminate\Support\Str;
use App\Models\Chat\Message;
use App\Exceptions\Exception;
use Laravel\Passport\Passport;
use OwenIt\Auditing\Auditable;
use App\Traits\MustVerifyEmail;
use App\Traits\MustVerifyMobile;
use App\Models\Chat\Conversation;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Multicaret\Acquaintances\Status;
use App\Actions\User\ListUserSetting;
use App\Enums\BalanceTransactionType;
use App\Models\Chat\MessageParticipant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use ZedanLab\Paymob\Models\PaymobPayout;
use App\Notifications\SendOtpNotification;
use Zorb\Promocodes\Traits\AppliesPromocode;
use Nicolaslopezj\Searchable\SearchableTrait;
use TaylorNetwork\UsernameGenerator\Generator;
use App\Notifications\SendOtpEmailNotification;
use Multicaret\Acquaintances\Traits\Friendable;
use App\Http\Resources\Refactoring\UserResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Actions\User\CreateReferralFirebaseDynamicLink;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;
use TaylorNetwork\UsernameGenerator\FindSimilarUsernames;
use Modules\ReferralProgram\Contracts\ReferralProgramMember;
use Modules\ReferralProgram\Traits\InteractsWithReferralProgram;
use App\Notifications\User\Affiliate\AffiliateJoinedNotification;
use App\Notifications\User\Affiliate\AffiliateRewardNotification;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements HasLocalePreference, ReferralProgramMember, AuditableContract
{
    use HasApiTokens, HasFactory, Notifiable, SearchableTrait, MustVerifyMobile, MustVerifyEmail;
    use FindSimilarUsernames;
    use Friendable;
    use InteractsWithReferralProgram {
        rewardReferrer as protected parentRewardReferrer;
        rewardReferee as protected parentRewardReferee;
    }
    use AppliesPromocode;
    use Auditable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'mobile',
        'organization_id',
        'image',
        'activate',
        'created_at',
        'pin_code',
        'email_verified_at',
        'verify_phone',
        'email',
        'affiliate_code',
        'affiliate_link',
        'referred_by',
        'referrer_id',
        'rated_the_app_on_store_at',
        'rated_the_app_at',
        'points',
        'free_points',
        'should_be_deleted_on',
        'deletion_request_reason',
        'referee_reward',
        'referrer_reward',
        'is_influencer',
        'national_id',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $searchable = [

        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name'   => 100,
            'users.email'  => 10,
            'users.mobile' => 20,
        ],
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'businessProfile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pin_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'         => 'datetime',
        'rated_the_app_on_store_at' => 'datetime',
        'rated_the_app_at'          => 'datetime',
        'activate'                  => 'boolean',
    ];

    /**
     * ----------------------------------------------------------------- *
     * --------------------------- Relations --------------------------- *
     * ----------------------------------------------------------------- *.
     */

    /**
     * @return mixed
     */
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization')->with('media');
    }

    /**
     * @return mixed
     */
    public function favourites()
    {
        return $this->belongsToMany('App\Models\Product', 'product_favourite_user');
    }

    // relation to get all save search of the user
    /**
     * @return mixed
     */
    public function searches()
    {
        return $this->hasMany(UserSearch::class, 'user_id');
    }

    /**
     * @return mixed
     */
    public function subAccounts()
    {
        return $this->belongsToMany('App\Models\SubAccount');
    }

    /**
     * @return mixed
     */
    public function marketerCode()
    {
        return $this->belongsTo('App\Models\MarketerCode');
    }

    /**
     * @return mixed
     */
    public function comments()
    {
        return $this->belongsToMany('App\Models\Post', 'comments');
    }

    /**
     * @return mixed
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\Post', 'likes');
    }

    /**
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * @return mixed
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Get the user' addresses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    /**
     * Get the user' ownConversations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownConversations()
    {
        return $this->hasMany(Conversation::class, 'creator_id');
    }

    /**
     * Get the user' inConversations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inConversations()
    {
        return $this->belongsToMany(Conversation::class, 'chat_conversation_participants', 'user_id');
    }

    /**
     * Get the user' sentMessages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * Get the user' inMessages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inMessages()
    {
        return $this->belongsToMany(Message::class, 'chat_message_participants', 'user_id')
                    ->using(MessageParticipant::class)
                    ->withPivot(['deleted_at', 'seen_at', 'received_at']);
    }

    /**
     * Get all of the user's password reset.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'user_id');
    }

    /**
     * Get all of the user's socials.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function socials()
    {
        return $this->morphMany(SocialAccount::class, 'sociable');
    }

    /**
     * Get all of the access tokens for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Passport::tokenModel(), 'user_id')->whereRevoked(false)->orderBy('created_at', 'desc');
    }

    /**
     * Get the user' reportsAgainstOthers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportsAgainstOthers()
    {
        return $this->hasMany(UserReport::class, 'reporter_id');
    }

    /**
     * Get the user' reportsAgainstHim.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportsAgainstHim()
    {
        return $this->hasMany(UserReport::class, 'reported_id');
    }

    /**
     * Get the businessProfile associated with the user.
     */
    public function businessProfile()
    {
        return $this->hasOne(UserBusinessProfile::class);
    }

    /**
     * Get the balanceTransactions associated with the user.
     */
    public function balanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::class)->latest();
    }

    /**
     * Get all of the payouts for the user.
     */
    public function payouts()
    {
        return $this->morphMany(PaymobPayout::class, 'receiver');
    }

    /**
     * Get seller relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asSellerCashbacks()
    {
        return $this->hasMany(Cashback::class, 'seller_id');
    }

    /**
     * Get buyer relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asBuyerCashbacks()
    {
        return $this->hasMany(Cashback::class, 'buyer_id');
    }

    /**
     * Get buyer relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function blockedFriendIds()
    {
        return $this->friends()->whereStatus(Status::BLOCKED)->select('id');
    }

    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Accessors --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * @return mixed
     */
    public function getAccountTypeAttribute()
    {
        return 'personal';

        $accountType = $this->subAccounts()->orderBy('id', 'desc')->where('user_id', $this->id)->first();

        if ($accountType) {
            return $accountType->name;
        } else {
            return "null";
        }
    }

    /**
     * @return mixed
     */
    public function fcmTokens()
    {
        return array_unique($this->tokens()->with(['platform'])->get()->filter(function ($accessToken) {
            return Str::length(optional($accessToken->platform)->token) > 60;
        })->map(function ($accessToken) {
            return optional($accessToken->platform)->token;
        })->toArray());
    }

    /**
     * @return mixed
     */
    public function getMobileNationalAttribute()
    {
        try {
            return str_replace(' ', '', phone($this->mobile)->formatNational());
        } catch (\Throwable$th) {}
    }

    /**
     * @return mixed
     */
    public function getTokenAttribute()
    {
        $user = User::where('id', $this->id)->first();
        $token = $user->createToken('authToken')->accessToken;
        if ($token) {
            return $token;
        } else {
            return "null";
        }
    }

    /**
     * @return mixed
     */
    public function getCountryAttribute()
    {
        try {
            return [
                'code'        => phone($this->mobile)->getCountry(),
                'phonePrefix' => (string) phone($this->mobile)->getPhoneNumberInstance()->getCountryCode(),
            ];
        } catch (\Throwable$th) {
            return;
        }
    }

    /**
     * @return mixed
     */
    public function getCountryCodeAttribute()
    {
        try {
            return phone($this->mobile)->getCountry();
        } catch (\Throwable$th) {
            return;
        }
    }

    /*
     * ----------------------------------------------------------------- *
     * ---------------------------- Mutators --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param $mobile
     */
    public function setMobileAttribute($mobile)
    {
        $this->attributes['mobile'] = \App\Helper::convert2english($mobile);
    }

    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Scopes ---------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Scope a query to only include like the given keyword.
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @param  string                                  $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $keyword)
    {
        $regexKeyword = \App\Helper::generate_pattern($keyword);

        return $query->where(function ($query) use ($keyword, $regexKeyword) {
            return $query->where('name', 'REGEXP', "{$regexKeyword}")
                         ->orWhere('mobile', 'like', "%{$keyword}%")
                         ->orWhere('email', 'like', "%{$keyword}%")
                         ->orWhere('id', 'like', "{$keyword}%");
        });
    }

    /**
     * Scope a query to only include verified users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVerified($query)
    {
        return $query->where(fn($query) => $query->where('mobile', 'like', '+20%')->where('verify_phone', 1))
                     ->orWhere(fn($query) => $query->where('mobile', 'not like', '+20%')->whereNotNull('email_verified_at'));
    }

    /**
     * Scope a query to only include unverified users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnverified($query)
    {
        return $query->where(fn($query) => $query->where('mobile', 'like', '+20%')->where('verify_phone', 0))
                     ->orWhere(fn($query) => $query->where('mobile', 'not like', '+20%')->whereNull('email_verified_at'));
    }

    /*
     * ----------------------------------------------------------------- *
     * ------------------------------ Misc ----------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Indicate if user can join affiliate program.
     *
     * @return bool
     */
    public function canAccessToMobileDashboard()
    {
        return $this->id === 156 || in_array($this->mobile, [
            '+201110466770', // mohamed reda

            '+201000093678', // zedan
            '+201144774369', // zedan // viewer
            '+201101009895', // saad
            '+201065079349', // body
            '+201202227860', // mirette
            '+201004394664', // mirette
        ]); // Just Suiiz team
    }

    /**
     * Indicate if user can join affiliate program.
     *
     * @return bool
     */
    public function canAccessToMobileDashboardAs()
    {
        if (!$this->canAccessToMobileDashboard()) {
            return '';
        }

        return $this->id === 156 || in_array($this->mobile, [
            '+201110466770', // mohamed reda

            '+201000093678', // zedan
            '+201101009895', // saad
            '+201065079349', // body
            '+201202227860', // mirette
            '+201004394664', // mirette
        ]) ? 'admin' : 'viewer'; // Just Suiiz team
    }

    /**
     * Send the mobile verification notification.
 *
     * @return void
     */
public function sendOtpNotification($code = null, $message = null)
    {
        $this->notify(new SendOtpNotification($code, $message));
    }

    /**
     * Send the password reset notification.
     *
     * @return void
     */
    public function sendPasswordResetNotification($code)
    {
        if ($this->shouldVerifyPhone()) {
            return $this->notify(new SendOtpNotification($code));
        }

        if ($this->shouldVerifyEmail()) {
            return $this->notify(new SendOtpEmailNotification($code));
        }
    }

    /**
     * Specifies the user's FCM tokens
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->fcmTokens();
    }

    /**
     * Specifies the user's mobile
     *
     * @return string|array
     */
    public function routeNotificationForTwilio()
    {
        return $this->mobile;
    }

    /**
     * Get the preferred locale of the entity.
     *
     * @return string|null
     */
    public function preferredLocale()
    {
        return ListUserSetting::run(['user_id' => $this->id, 'key' => 'locale']);
    }

    /**
     * @return mixed
     */
    public function generateAffiliateCode()
    {
        $generator = new Generator(['unique' => true]);
        $code = $generator->generateFor($this);
        return $code;
    }

    /**
     * Reward the referrer
     *
     * @param  self   $referee
     * @return void
     */
    protected function rewardReferrer(ReferralProgramMember $referee): void
    {
        $isSuccessful = DB::transaction(function () use ($referee) {
            $response = \App\Helper::platformTransaction(
                userId:$this->id,
                amount:$this->referrerReward(),
                modelData:UserResource::make($referee)->resolve(),
                modelType:$referee::class,
                modelId:$referee->getKey(),
                type:BalanceTransactionType::REFERRER_REWARD,
            );

            if (!$response->successful()) {
                return false;
            }

            $this->parentRewardReferrer($referee);
        });

        if ($isSuccessful === false) {
            return;
        }

        $this->notify(new AffiliateRewardNotification($referee->name, $this->referrerReward()));
    }

    /**
     * Reward the referee
     *
     * @param  self   $referee
     * @return void
     */
    protected function rewardReferee(ReferralProgramMember $referee): void
    {
        $isSuccessful = DB::transaction(function () use ($referee) {
            $response = \App\Helper::platformTransaction(
                userId:$referee->id,
                amount:$this->refereeReward(),
                modelData:UserResource::make($this)->resolve(),
                modelType:$this::class,
                modelId:$this->getKey(),
                type:BalanceTransactionType::REFEREE_REWARD,
            );

            throw_if(
                !$response->successful(),
                Exception::throw(__('Sorry, you cannot join referral program.'), 400));

            $this->parentRewardReferee($referee);
        });

        if ($isSuccessful === false) {
            return;
        }

        $referee->notify(new AffiliateJoinedNotification($this->refereeReward()));
    }

    /**
     * Retrieve model's referral code.
     *
     * @return string|null
     */
    public function getReferralCode(): string | null
    {
        if (!is_null($code = $this->{static::getReferralCodeAttributeName()})) {
            return $code;
        }

        $this->{static::getReferralCodeAttributeName()} = $code = $this->generateAffiliateCode();

        return $code;
    }

    /**
     * Check if the user can refer the given user.
     *
     * @param  \Modules\ReferralProgram\Contracts\ReferralProgramMember $referee
     * @throws \Exception
     * @return void
     */
    public function canRefer(ReferralProgramMember $referee): void
    {
        throw_if(!filter_var($this->verify_phone, FILTER_VALIDATE_BOOLEAN), Exception::throw(__('Your mobile number is not verified')));
        throw_if(!filter_var($referee->verify_phone, FILTER_VALIDATE_BOOLEAN), Exception::throw(__('Your mobile number is not verified')));
        throw_if($this->is($referee), new Exception(__('referring.possible_to_join_by_your_code'), 400));
        throw_if(!is_null($referee->{static::getReferredByAttributeName()}), new Exception(__('referring.already_joined_to_referral'), 400));

        $refereePlatform = (new Platform(user:$referee))->getPlatform();

        if (
            is_null($refereePlatform)
            || in_array($refereePlatform->fingerprint, [null, 'dummy'])
        ) {
            return;
        }

        $sameFingerprintReferringBefore = User::withOnly([])
            ->whereHas('tokens', fn($q) => $q->whereHas('platform', fn($q) => $q->where('fingerprint', $refereePlatform->fingerprint)))
            ->whereNotNull('referrer_id')
            ->count();

        throw_if(
            $sameFingerprintReferringBefore > 0,
            Exception::throw(__('Sorry, you cannot join referral program.'), 400));
    }

    /**
     * @param  Model  $recipient
     * @return bool
     */
    public function hasBlocked(Model $recipient)
    {
        if ($this->is($recipient)) {
            return false;
        }

        if ($this->relationLoaded('friends')) {
            $hasBlock = $this->friends->first(function ($friendship) use ($recipient) {
                return $friendship->recipient_type == get_class($recipient) && $friendship->recipient_id == $recipient->id && $friendship->status == Status::BLOCKED;
            });

            return !is_null($hasBlock);
        }

        return $this->friends()->whereRecipient($recipient)->whereStatus(Status::BLOCKED)->exists();
    }

    /**
     * @param  Model  $recipient
     * @return bool
     */
    public function isBlockedBy(Model $recipient)
    {
        return $recipient->hasBlocked($this);
    }

    /**
     * Build the given model's referral firebase dynamic link.
     *
     * @param  \Modules\ReferralProgram\Contracts\ReferralProgramMember $model
     * @return string|null
     */
    public static function buildReferralDeepLink(ReferralProgramMember $model): string | null
    {
        if (!$model::shouldGenerateReferralData()) {
            return null;
        }

        return CreateReferralFirebaseDynamicLink::run($model);
    }

    /**
     * Referring a user.
     *
     * @param  \Modules\ReferralProgram\Contracts\ReferralProgramMember $referee
     * @return void
     */
    public function refer(ReferralProgramMember $referee): void
    {
        $this->canRefer($referee);

        DB::transaction(function () use ($referee) {
            $this->rewardReferee($referee);
            $this->rewardReferrer($referee);
        });
    }
}
