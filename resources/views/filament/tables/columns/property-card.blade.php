{{--{{ dd($getRecord()->user->name) }}--}}

<div style="display: flex; flex-direction: column; gap: 4px;">
    <span style="font-weight: bold; font-size: 1.1em;">{{ $getRecord()->title }}</span>
    <span style="color: #666; font-size: 0.9em;">{{ $getRecord()->location?->area_name ?? 'Address not set' }}</span>
    <span style="font-weight: bold; font-size: 1em;">{{ number_format($getRecord()->rentAndAdditionalCost?->monthly_rent) .' / mo' ?? 'Rent not set' }}</span>
</div>
