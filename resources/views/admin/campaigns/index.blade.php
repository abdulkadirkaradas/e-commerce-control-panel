@extends('layouts.admin')
@section('content')
@can('campaign_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.campaigns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.campaign.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.campaign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Campaign">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.customer_uuid') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.product_uuid') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaigns as $key => $campaign)
                        <tr data-entry-id="{{ $campaign->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $campaign->id ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->name ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->description ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->customer_uuid->name ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->product_uuid->name ?? '' }}
                            </td>
                            <td>
                                @can('campaign_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.campaigns.show', $campaign->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('campaign_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.campaigns.edit', $campaign->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('campaign_delete')
                                    <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('campaign_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.campaigns.massDestroy') }}",
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
  let table = $('.datatable-Campaign:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
