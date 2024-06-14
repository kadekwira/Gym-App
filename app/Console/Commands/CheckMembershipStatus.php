<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class CheckMembershipStatus extends Command
{
    protected $signature = 'membership:check';
    protected $description = 'Check membership status and update if expired';

    public function handle()
    {
        $expiredMembers = User::where('membership_end', '<', Carbon::now())->get();

        foreach ($expiredMembers as $member) {
            $member->status = 'inactive';
            $member->save();
        }

        $this->info('Membership status checked and updated successfully');
    }
}
