<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string $manager_id
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $employees
 * @property-read int|null $employees_count
 * @property-read \App\Models\User|null $manager
 * @method static \Illuminate\Database\Eloquent\Builder|Department address($keyword)
 * @method static \Database\Factories\DepartmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Department manager($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Department name($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department phone($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EduLevel
 *
 * @property int $id
 * @property int $employee_id
 * @property string $major
 * @property string $certificate
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $employee
 * @method static \Database\Factories\EduLevelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EduLevel whereUpdatedAt($value)
 */
	class EduLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $note
 * @property string|null $schedule
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $employees
 * @property-read int|null $employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobEvaluation[] $job_evaluations
 * @property-read int|null $job_evaluations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Job assignee($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Job createdDate($startDate, $endDate)
 * @method static \Database\Factories\JobFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Job name($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job schedule($startDate, $endDate)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobEvaluation
 *
 * @property int $id
 * @property string $progress
 * @property string $status
 * @property string $kpi
 * @property int $job_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Job $job
 * @method static \Database\Factories\JobEvaluationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereKpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobEvaluation whereUpdatedAt($value)
 */
	class JobEvaluation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Position
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $employees
 * @property-read int|null $employees_count
 * @method static \Database\Factories\PositionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Salary
 *
 * @property int $id
 * @property int $employee_id
 * @property int $basic_salary
 * @property int|null $cofficient
 * @property int|null $allowance
 * @property int|null $bonus
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $employee
 * @method static \Database\Factories\SalaryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereCofficient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereUpdatedAt($value)
 */
	class Salary extends \Eloquent {}
}

namespace App\Models{
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
 * @property string|null $gender
 * @property string|null $birthday
 * @property string $identity_card
 * @property string|null $major
 * @property string|null $certificate
 * @property int $department_id
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\EduLevel $eduLevel
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Position[] $positions
 * @property-read int|null $positions_count
 * @property-read \App\Models\Salary $salary
 * @method static \Illuminate\Database\Eloquent\Builder|User department($department_id)
 * @method static \Illuminate\Database\Eloquent\Builder|User email($searchKeyword)
 * @method static \Illuminate\Database\Eloquent\Builder|User location($searchKeyword)
 * @method static \Illuminate\Database\Eloquent\Builder|User name($searchKeyword)
 * @method static \Illuminate\Database\Eloquent\Builder|User phone($searchKeyword)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentityCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMajor($value)
 */
	class User extends \Eloquent {}
}

