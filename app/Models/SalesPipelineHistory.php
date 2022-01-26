<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesPipelineHistory extends Model
{
    protected $fillable = [
        'sales_pipeline_id',
        'date',
        'total_volume',
        'forecast',
        'comments',
        'project_closing_month',
        'project_closing_year',
    ];

    public function salesPipeline(){
        return $this->belongsTo(SalesPipline::class);
    }
}
