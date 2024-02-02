<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'activar_horario_especial',
        'administrador',
        'apellido',
        'cant_perro',
        'costo_dias_feriado',
        'costo_dias_normales',
        'costo_hospedaje',
        'codigo_de_verificacion',
        'descuento_primer_dia',
        'descuento_primer_dia_feriado',
        'descuento ultimo dia',
        'descuento_ultimo_dia_feriado',
        'dias_feriados',
        'dias_hospedaje',
        'dias_normales',
        'fecha_busqueda',
        'fecha_llegada',
        'fecha_fin_feriado',
        'fecha_inicio_feriado',
        'fecha_feriado_rango_fin',
        'fecha_feriado_rango_Inicio',
        'foto_perfil',
        'idioma',
        'pets', //OJO
        'multiples_groomings',
        'persona',
        'precio_descuento_primer_dia',
        'precio_descuento_ultimo_dia',
        'selección_de_perro',
        'telefono',      
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'administrador',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function grooming(): HasMany
    {
        return $this->hasMany(Grooming::class);
    }
}
