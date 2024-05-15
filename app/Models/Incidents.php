<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidents extends Model
{
    use HasFactory;
    protected $table='incidents';
    protected $fillable=['id','reporter_type','incident_id','reporter_name', 'incident_details','incident_report_time',
    'priority','incident_status','user_id'];
    //dd('vib');
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
