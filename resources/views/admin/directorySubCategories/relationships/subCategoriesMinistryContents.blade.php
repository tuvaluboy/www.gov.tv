@can('ministry_content_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ministry-contents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ministryContent.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.ministryContent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subCategoriesMinistryContents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ministryContent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ministryContent.fields.sub_categories') }}
                        </th>
                        <th>
                            {{ trans('cruds.ministryContent.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.ministryContent.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ministryContents as $key => $ministryContent)
                        <tr data-entry-id="{{ $ministryContent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ministryContent->id ?? '' }}
                            </td>
                            <td>
                                @foreach($ministryContent->sub_categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $ministryContent->title ?? '' }}
                            </td>
                            <td>
                                {{ App\MinistryContent::STATUS_SELECT[$ministryContent->status] ?? '' }}
                            </td>
                            <td>
                                @can('ministry_content_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ministry-contents.show', $ministryContent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ministry_content_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ministry-contents.edit', $ministryContent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ministry_content_delete')
                                    <form action="{{ route('admin.ministry-contents.destroy', $ministryContent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ministry_content_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ministry-contents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-subCategoriesMinistryContents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection