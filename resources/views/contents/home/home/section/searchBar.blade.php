<section class="section call-to-action call-to-action-text-light bg-primary-2 call-to-action-height-1">
    <div class="container">
        <form action="{{ route('home.search.results') }}" method="GET">
            <div class="row">
                <div class="col-lg-4">
                    <input style="padding: 0.6rem .75rem;" class="form-control form-control-sm rounded" type="text" placeholder="Kata Kunci" name="keywords">
                </div>
                <div class="col-lg-4">
                    <input style="padding: 0.6rem .75rem;" class="form-control form-control-sm rounded" type="text" placeholder="Pengarang" name="author">
                </div>
                <div class="col-lg-3">
                    <input style="padding: 0.6rem .75rem;" class="form-control form-control-sm rounded" type="text" placeholder="Penerbit" name="publisher">
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn btn-danger">Cari</button>
                </div>
            </div>
        </form>
    </div>
</section>