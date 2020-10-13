@extends('layouts.admin')
@section('content')
@can('imageslide_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.imageslides.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.imageslide.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.imageslide.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Imageslide">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.page') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.firstbutton') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.firstbutton_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.secondbutton') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.secondbutton_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.imageslide.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imageslides as $key => $imageslide)
                        <tr data-entry-id="{{ $imageslide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $imageslide->id ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->title ?? '' }}
                            </td>
                            <td>
                                @if($imageslide->image)
                                    <a href="{{ $imageslide->image->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $imageslide->page->name ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->description ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->firstbutton ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->firstbutton_link ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->secondbutton ?? '' }}
                            </td>
                            <td>
                                {{ $imageslide->secondbutton_link ?? '' }}
                            </td>
                            <td>
                                {{ App\Imageslide::STATUS_SELECT[$imageslide->status] ?? '' }}
                            </td>
                            <td>
                                @can('imageslide_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.imageslides.show', $imageslide->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('imageslide_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.imageslides.edit', $imageslide->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('imageslide_delete')
                                    <form action="{{ route('admin.imageslides.destroy', $imageslide->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('imageslide_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.imageslides.massDestroy') }}",
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
  let table = $('.datatable-Imageslide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection