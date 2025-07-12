<?php

namespace App\Filament\Resources\XpTeamResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\XpTeamResource;

class ListXpTeams extends ListRecords
{
    protected static string $resource = XpTeamResource::class;

    protected static ?string $title = 'Daftar Tim Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Tim'),
        ];
    }

    public function getTabs(): array
    {
        // if (Auth::user()?->hasAnyRole(['admin', 'super_admin'])) {
        //     $tabs = [
        //         'all' => Tab::make()
        //             ->label('Semua')
        //     ];
        // }
        // dd(auth());
        $tabs['tim saya'] = Tab::make()
                ->label('Tim Saya')
                ->modifyQueryUsing(function (Builder $query) {
                    $user = auth()->user();
                    if (!$user || !$user->xpUserExpo) {
                        return $query->whereRaw('0 = 1');
                    }
                    $teamIds = $user->xpUserExpo->xpAnggotaTeams->pluck('xp_team_id');
                    return $query->whereIn('id', $teamIds);
                });
        $tabs['all'] = Tab::make()
            ->label('Semua');
        return $tabs;
    }
}
