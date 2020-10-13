@extends('layouts.admin')
@section('content')
@can('vacancy_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vacancies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vacancy.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vacancy.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vacancy">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.duedate') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacancy.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vacancies as $key => $vacancy)
                        <tr data-entry-id="{{ $vacancy->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vacancy->id ?? '' }}
                            </td>
                            <td>
                                {{ $vacancy->title ?? '' }}
                            </td>
                            <td>
                                {{ $vacancy->rate ?? '' }}
                            </td>
                            <td>
                                {{ $vacancy->level ?? '' }}
                            </td>
                            <td>
                                @if($vacancy->file)
                                    <a href="{{ $vacancy->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $vacancy->duedate ?? '' }}
                            </td>
                            <td>
                                {{ App\Vacancy::STATUS_SELECT[$vacancy->status] ?? '' }}
                            </td>
                            <td>
                                @can('vacancy_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vacancies.show', $vacancy->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vacancy_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vacancies.edit', $vacancy->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vacancy_delete')
                                    <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vacancy_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vacancies.massDestroy') }}",
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
  let table = $('.datatable-Vacancy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection