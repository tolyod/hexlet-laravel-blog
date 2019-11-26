<h1>О блоге</h1>
<p>Эксперименты с Ларавелем на Хекслете</p>

@foreach ($team as $member)
    <h2>{{ $member['name'] }}</h2>
    <p>{{ $member['position'] }}</p>
@endforeach
