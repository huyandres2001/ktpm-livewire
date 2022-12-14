<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $phone
 * @property string|null $location
 * @property string|null $about
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'phone',
        'email',
        'identity_card',
        'location',
        'department_id',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param String $searchKeyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query, $searchKeyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($searchKeyword != '') return $query->where('name', 'like', '%' . $searchKeyword . '%');
        return $query;
    }
    public function scopePhone($query, $searchKeyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($searchKeyword != '') return $query->where('phone', 'like', '%' . $searchKeyword . '%');
        return $query;
    }
    public function scopeEmail($query, $searchKeyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($searchKeyword != '') return $query->where('email', 'like', '%' . $searchKeyword . '%');
        return $query;
    }
    public function scopeLocation($query, $searchKeyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($searchKeyword != '') return $query->where('location', 'like', '%' . $searchKeyword . '%');
        return $query;
    }
    public function scopeDepartment($query, $department_id): \Illuminate\Database\Eloquent\Builder
    {
        if ($department_id != '') return $query->where('department_id', $department_id);
        return $query;
    }
    // public function scopeJob($query, $jobId)
    // {
    //     if ($department_id != '') return $query->where('department_id', $department_id);
    //     return $query;
    // }
    public function jobs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'employee_job', 'employee_id', 'job_id');
    }
    public function positions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'employee_position', 'employee_id', 'position_id');
    }
    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function salary(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Salary::class, 'employee_id')->withDefault();
    }
    public function eduLevel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(EduLevel::class, 'employee_id')->withDefault([
            'major' => 'No Major',
            'certificate' => 'No Certificate',
            'description' => 'No Certificate',
        ]);
    }
}
