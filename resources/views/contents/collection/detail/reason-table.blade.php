<table class="uk-table uk-table-hover">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th>Kategori</th>
        <th>Catatan</th>
        <th>Oleh</th>
        <th>Pada</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($collection->reasons as $key => $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->reason()->exists() ? $item->reason->name : 'Lainnya' }}</td>
            <td>{{ $item->reason_text }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y - %H:%M') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>