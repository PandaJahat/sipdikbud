<div class="md-card">
    <div class="md-card-toolbar">
        <h3 class="md-card-toolbar-heading-text">
            5 Publikasi Teratas
        </h3>
    </div>
    <div class="md-card-content">
        <div style="height: 400px;">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th class="uk-text-nowrap">Judul</th>
                        <th class="uk-text-nowrap">Penulis</th>
                        <th class="uk-text-nowrap uk-text-right">Dikunjungi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($top_collections as $item)
                    <tr class="uk-table-middle">
                        <td class="uk-width-6-10"><a href="{{ route('collection.detail', ['id' => Crypt::encrypt($item->id), 'prev_url' => Crypt::encrypt(Request::fullUrl())]) }}">{{ $item->title }}</a></td>
                        <td class="uk-width-1-10 uk-text-nowrap ">{{ $item->author()->exists() ? $item->author->name : '' }}</td>
                        <td class="uk-width-1-10 uk-text-right uk-text-muted uk-text-small">{{ $item->visits_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>