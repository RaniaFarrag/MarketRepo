<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th style="padding-top: 30px;">
            <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-success m-auto">
                    <input type="checkbox" name="Checkboxes15" id="checkAll" value="1"  {{isset($checkAll) &&$checkAll==1 ? "checked" :"" }}>
                    <span class="m-0"></span>
                </label>
            </div>
        </th>
        <th>{{ trans('dashboard.Sl.No') }}</th>
        <th>{{ trans('dashboard.Date') }}</th>
        <th>{{ trans('dashboard.Lead Source') }}</th>
        <th>{{ trans('dashboard.Lead status') }}</th>
        <th>{{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Contact Person') }}</th>
        <th>{{ trans('dashboard.Contact No') }}</th>
        <th>{{ trans('dashboard.Whatsapp') }}</th>
        <th>{{ trans('dashboard.Email') }}</th>
        <th>{{ trans('dashboard.Brochure status') }}</th>
        <th>{{ trans('dashboard.Category of Requirement') }}</th>
        <th>{{ trans('dashboard.Quantity') }}</th>
        <th>{{ trans('dashboard.Type of Service required') }}</th>
        <th>{{ trans('dashboard.Company Representative name') }}</th>
        <th>{{ trans('dashboard.Location') }}</th>
        <th>{{ trans('dashboard.Client Feedback') }}</th>


        <th>{{ trans('dashboard.Next FollowUp') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>  <label class="checkbox checkbox-outline checkbox-success m-auto">
                    <input type="checkbox" class=" checkReports items " value="{{$report->id}}" name="ids[]"  {{isset($ids)&& in_array($report->id,$ids) || isset($checkAll)&&$checkAll==1 ? "checked" :"" }}>
                    <span class="m-0"></span>
                </label>
            </td>
            <td>{{$report->id}}</td>
            <td>{{$report->created_at->format('d/m/Y')}}</td>
            <td>Marketing-Hc</td>
            <td>
                @if($report->statue)
                    @if($report->statue == 1)
                        {{ trans('dashboard.Hot') }}
                    @elseif($report->statue == 2)
                        {{ trans('dashboard.Warm') }}
                    @elseif($report->statue == 3)
                        {{ trans('dashboard.Cold') }}
                    @elseif($report->statue == 4)
                        {{ trans('dashboard.Awarded') }}
                    @endif
                @else
                    -
                @endif
            </td>
            <td>{{$report->company->name ?? '-'}}</td>
            {{--<td><a target="_blank" href="{{route('companies.show',$report->company->id)}}">{{$report->company->name ?? '-'}}</a></td>--}}
            <td>{{$report->company->company_representative_name ?? '-'}}</td>
            <td>{{$report->company->company_representative_phone?? '-'}}</td>
            <td>{{$report->company->company_representative_mobile?? '-'}}</td>
            <td><a href="mailto:{{$report->company->company_representative_email ?? ''}}">{{$report->company->company_representative_email?? '-'}}</a></td>
            <td>{{$report->brochurs_status?? '-'}}</td>
            <td>{{$report->type_of_serves?? '-'}}</td>

            <td>{{$report->quanity?? '-'}}</td>
            <td>{{$report->cat_of_req?? '-'}}</td>
            <td>{{app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en}}</td>

            <td>{{$report->company->city->name ?? '-'}}</td>
            <td><span style="width: 500px !important;display: block;">{{$report->client_feeback?? '-'}}</span></td>
            <td>{{$report->nextFollowUp?? '-'}}</td>

        </tr>
    @endforeach

    </tbody>

</table>
{!! $reports->links() !!}
