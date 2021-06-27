<!--begin: Datatable-->
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
        <th>#</th>
        <th style="max-width: 350px;">{{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Sector') }}</th>
        <th>{{ trans('dashboard.Company Type') }}</th>
        <th>{{ trans('dashboard.E-mail') }}</th>
        <th>{{ trans('dashboard.Mobile / WhatsApp number') }}</th>
        <th style="width: 200px;">{{ trans('dashboard.Send Message') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-success m-auto ">
                        <input type="checkbox" name="company_ids[]" {{isset($ids)&& in_array($company->whatsapp,$ids)  ? "checked" :"" }}
                        class="checkPhones items" value="{{ $company->whatsapp }}">
                        <span class="m-0"></span>
                    </label>
                </div>
            </td>

            <td style="width: 34px;">{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            {{--<td><a href="{{ route('companies.show' , $company->id) }}">{{ $company->name }}</a></td>--}}
            <td>{{ $company->sector ? $company->sector->name : trans('dashboard.non') }}</td>
            <td>{{ $company->subSector ? $company->subSector->name : trans('dashboard.non') }}</td>

            <td>{{ $company->email ? $company->email : trans('dashboard.non') }}</td>
            <td>{{ $company->whatsapp ? $company->whatsapp : trans('dashboard.non') }}</td>

            <td>

                @if($company->whatsapp)
                    <a data-id="{{ $company->whatsapp }}" href="#btnModal" class="singlePhone mr-2"
                       data-toggle="modal">
                        <i class="fab fa-2x text-success fa-whatsapp"></i>
                    </a>
                @else
                    <a href="javascript:;" class="singlePhone mr-2"
                       data-toggle="modal">
                        <i class="fab fa-2x text-success fa-whatsapp"></i>
                    </a>
                @endif

                @if($company->email)
                    <a href="mailto:{{ $company->email }}" class="mr-2" >
                        <i class="fab fa-2x text-primary far fa-envelope"></i>
                    </a>
                @else
                    <a href="javascript:;" class="mr-2" >
                        <i class="fab fa-2x text-primary far fa-envelope"></i>
                    </a>
                @endif

                @if($company->whatsapp)
                    <a href="sms:{{ $company->whatsapp }}" class="mr-2"><i class="fab fa-2x text-warning  fas fa-sms"></i>
                    </a>
                @else
                    <a href="javascript:;" class="mr-2"><i class="fab fa-2x text-warning  fas fa-sms"></i>
                    </a>
                @endif

                @if($company->website)
                    <a href="{{ $company->website }}" class="mr-2" target="_blank">
                        <i class="fab fa-2x text-info  fas fa-globe"></i>
                    </a>
                @else
                    <a href="javascript:;" class="mr-2">
                        <i class="fab fa-2x text-info  fas fa-globe"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
{{ $companies->links() }}
<!--end: Datatable-->
