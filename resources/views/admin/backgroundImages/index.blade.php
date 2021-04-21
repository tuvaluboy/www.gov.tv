@extends('layouts.admin')
@section('content')
@can('background_image_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.background-images.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.backgroundImage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.backgroundImage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BackgroundImage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.page') }}
                        </th>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($backgroundImages as $key => $backgroundImage)
                        <tr data-entry-id="{{ $backgroundImage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $backgroundImage->id ?? '' }}
                            </td>
                            <td>
                                {{ App\BackgroundImage::PAGE_SELECT[$backgroundImage->page] ?? '' }}
                            </td>
                            <td>
                                @if($backgroundImage->image)
                                    <a href="{{ $backgroundImage->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $backgroundImage->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\BackgroundImage::STATUS_SELECT[$backgroundImage->status] ?? '' }}
                            </td>
                            <td>
                                @can('background_image_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.background-images.show', $backgroundImage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('background_image_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.background-images.edit', $backgroundImage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('background_image_delete')
                                    <form action="{{ route('admin.background-images.destroy', $backgroundImage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('background_image_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.background-images.massDestroy') }}",
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
  let table = $('.datatable-BackgroundImage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection