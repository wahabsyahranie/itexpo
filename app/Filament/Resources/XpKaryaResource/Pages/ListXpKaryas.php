<?php

namespace App\Filament\Resources\XpKaryaResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\XpKaryaResource;

class ListXpKaryas extends ListRecords
{
    protected static string $resource = XpKaryaResource::class;

    protected static ?string $title = 'Daftar Karya Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Karya'),
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
        $tabs['all'] = Tab::make()
            ->label('Semua');
        $tabs['milik saya'] = Tab::make()
                ->label('Karya Saya')
                ->modifyQueryUsing(function (Builder $query) {$user = auth()->user();
                    if (!$user || !$user->xpUserExpo) {
                        return $query->whereRaw('0 = 1'); // tidak tampilkan apapun jika tidak valid
                    }
                    $teamIds = $user->xpUserExpo->xpAnggotaTeams->pluck('xp_team_id');
                    return $query->whereIn('xp_team_id', $teamIds);
                });
        $tabs['dipublikasi'] = Tab::make()
                ->label('Dipublikasikan')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('dipublikasi', 1));
                
        return $tabs;
    }
}
