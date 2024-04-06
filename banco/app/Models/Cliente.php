<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable
{
    use Notifiable, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clientes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_documento', 
        'numero_identificacion', 
        'nombres', 
        'apellidos', 
        'razon_social', 
        'municipio', 
        'departamento', 
        'email', 
        'contraseña', 
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña', 
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
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    /**
     * Relationships
     */

    // Si tienes otras relaciones, como una con la tabla 'roles', puedes definirlas aquí.

    /**
     * Get the role associated with the cliente.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    // Aquí puedes añadir más métodos relacionados con tu lógica de negocio.
}
