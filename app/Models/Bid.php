<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'deadline',
        'status',
        'budget',
        'currency',
        'evaluation_criteria',
        'minimum_experience',
        'submission_method',
        'bid_opening_date',
        'bid_document',
        'location',
        'contact_person',
        'contact_email',
        'requirements',
        'attachments',
        'winner_company_id',
    ];

    protected $casts = [
        'requirements' => 'array',
        'attachments' => 'array',
        'bid_opening_date' => 'datetime',
        'deadline' => 'date',
    ];

    /**
     * Relationship with the winner company.
     */
    public function winnerCompany()
    {
        return $this->belongsTo(Companies::class, 'winner_company_id');
    }

    /**
     * Relationship with bid applications.
     */
    public function applications()
    {
        return $this->hasMany(Bid_application::class);
    }

    /**
     * Check if the bid is still open.
     */
    public function isOpen()
    {
        return $this->status === 'open' && $this->deadline >= now();
    }

    /**
     * Get formatted budget with currency.
     */
    public function getFormattedBudgetAttribute()
    {
        return number_format($this->budget, 2) . ' ' . $this->currency;
    }

    /**
     * Scope to get only open bids.
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open')->where('deadline', '>=', now());
    }
}
