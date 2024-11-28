<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'ourjobs';
    protected $fillable = ['title', 'company', 'location', 'description','industry'];
    public function applications() {
        return $this->hasMany(Application::class);
    }

}
