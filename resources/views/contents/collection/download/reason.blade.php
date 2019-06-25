<div class="uk-modal" id="collection-download">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Tujuan Mengunduh Koleksi</h3>
        </div>
        
        <form action="{{ route('collection.download.reason.submit') }}" method="POST" target="_blank" onsubmit="setTimeout(function(){window.location.reload();},10)">
            @csrf
            <input type="hidden" name="collection_id">
            <input type="hidden" name="previous_url" value="{{ Request::fullUrl() }}">
            <div class="uk-form-row">
                <select name="reason_id" required>
                    <option value="">Pilih Tujuan Mengunduh</option>
                </select>
            </div>
            <div class="uk-form-row" style="display: none" id="reason_text">
                <label>Jelaskan Tujuan</label>
                <textarea cols="30" rows="4" class="md-input" name="reason_text"></textarea>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-default uk-modal-close">Batalkan</button>
                <button type="submit" class="md-btn md-btn-primary">Download</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        var select_reason = $('select[name=reason_id]')
        
        $(function () {
            select_reason.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                plugins: {
                    remove_button: {
                        label: ""
                    }
                },
                onDropdownOpen: function (t) {
                    t.hide().velocity("slideDown", {
                        begin: function () {
                            t.css({
                                "margin-top": "0"
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onDropdownClose: function (t) {
                    t.show().velocity("slideUp", {
                        complete: function () {
                            t.css({
                                "margin-top": ""
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onChange: function (value) {
                    var reason_text = $('#reason_text')
                    if (value === 'other') {
                        reason_text.fadeIn('slow')
                    } else {
                        reason_text.fadeOut('slow')
                    }
                }
            })

            $.get("{{ route('collection.download.get.reasons') }}").done(function (result) {
                select_reason[0].selectize.load(function (callback) {
                    callback(result)
                })
            })
        })

        function downloadCollection(id) {
            $('#collection-download').find('input[name=collection_id]').val(id)
            UIkit.modal('#collection-download').show();
        }
    </script>
@endpush