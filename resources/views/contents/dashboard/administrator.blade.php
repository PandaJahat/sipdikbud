@extends('layouts.default')

@include('plugins.amchart')
@include('plugins.peity')

@section('content')
<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                <span class="uk-text-muted uk-text-small">Publikasi</span>
                <h2 class="uk-margin-remove"><span id="count-collections">0</span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                <span class="uk-text-muted uk-text-small">Pengunduhan</span>
                <h2 class="uk-margin-remove"><span id="count-downloads">0</span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                <span class="uk-text-muted uk-text-small">Publikasi Terunduh</span>
                <h2 class="uk-margin-remove"><span id="count-collection-downloaded">0</span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                <span class="uk-text-muted uk-text-small">Kunjungan</span>
                <h2 class="uk-margin-remove" id="peity_live_text">0</h2>
            </div>
        </div>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-1-2">
        @include('contents.dashboard.administrator.top-collections')
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function () {
            function e(e, t) {
                return Math.floor(Math.random() * (t - e + 1)) + e
            }
            $(".peity_orders").peity("donut", {
                height: 24,
                width: 24,
                fill: ["#8bc34a", "#eee"]
            }), $(".peity_visitors").peity("bar", {
                height: 28,
                width: 48,
                fill: ["#d84315"],
                padding: .2
            }), $(".peity_sale").peity("line", {
                height: 28,
                width: 64,
                fill: "#d1e4f6",
                stroke: "#0288d1"
            }), $(".peity_conversions_large").peity("bar", {
                height: 64,
                width: 96,
                fill: ["#d84315"],
                padding: .2
            });
            var t = $(".peity_live");
            if (t.length) {
                var a = t.peity("line", {
                    height: 28,
                    width: 64,
                    fill: "#efebe9",
                    stroke: "#5d4037"
                });
                $("#peity_live_text").text("0"), setInterval(function () {
                    var t = Math.round(10 * Math.random()),
                        i = a.text().split(",");
                    i.shift(), i.push(t), a.text(i.join(",")).change();
                    var n = parseInt($("#peity_live_text").text());
                    if (n == (r = e(20, 100))) var r = e(20, 120);
                    //  new CountUp("peity_live_text", n, r, 0, 1.2).start()
                }, 2e3)
            }

            new CountUp('count-collections', 0, "{{ $data['collectionts_count'] }}").start();
            new CountUp('count-downloads', 0, "{{ $data['downloads_count'] }}").start();
            new CountUp('count-collection-downloaded', 0, "{{ $data['collectionts_downloaded_count'] }}").start();
            new CountUp('peity_live_text', 0, "{{ $data['visits_count'] }}").start();
        });
    </script>
@endpush