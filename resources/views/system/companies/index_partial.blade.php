

    @foreach($data['companies'] as $company)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch border-1 border-primary border">
                <!--begin::Body-->
                <div class="card-body p-4">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end">



                        <div class="dropdown dropdown-inline" data-toggle="tooltip" data-trigger="focus"
                             title=""
                             data-placement="left"
                             data-original-title="{{count($company->companyMeetings) ?  $company->companyMeetings[ count($company->companyMeetings) - 1 ]->date . ' ' .$company->companyMeetings[ count($company->companyMeetings) - 1 ]->time : ''  }}">
                            <a href="javascript:;"
                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon pulse pulse-primary text-primary">
                                <i class="far fa-bell text-primary"></i>
                                @if(count($company->companyMeetings))
                                     <span class="pulse-ring"></span>
                                @endif
                                <span class="badge" id="count-alert2">{{ count($company->companyMeetings) ? count($company->companyMeetings) : 0 }}</span>
                            </a>
                        </div>

                        <div class="dropdown dropdown-inline">
                            <a href="javascript:;"
                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                               data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right"
                                 style="">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover py-5">
                                    <li class="navi-item">
                                        <a href="{{ route('companies.show' , $company->id) }}" class="navi-link">
                                    <span class="navi-icon"><i
                                                class="flaticon2-list-3"></i></span>
                                            <span class="navi-text">{{ trans('dashboard.View Company Data') }}</span>
                                        </a>
                                    </li>

                                    @can('Show Company Needs')
                                        <li class="navi-item">
                                            <a href="{{ route('company_needs.index' , [$company->id , $hidden_mother_company_id]) }}" class="navi-link">
                                        <span class="navi-icon"><i
                                                    class="flaticon2-list-3"></i></span>
                                                <span class="navi-text">{{ trans('dashboard.View Company Needs') }}</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('Edit Company')
                                    <li class="navi-item">
                                        <a href="{{ route('companies.edit' , $company->id) }}"
                                           class="navi-link">
                                    <span class="navi-icon"><i
                                                class="flaticon-edit"></i></span>
                                            <span class="navi-text">{{ trans('dashboard.Modifying Company Data') }}</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('Send Mail')
                                    <li class="navi-item">
                                        <a data-id="{{ $company->email ?? '-' }}" href="#mail_Modal" class="navi-link"
                                           data-toggle="modal">
                                            <span class="navi-icon"><i
                                                class="flaticon2-rocket-1"></i></span>
                                            <span class="navi-text">{{ trans('dashboard.Send Email') }}</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('Delete Company')
                                    <li class="navi-item">
                                        <form id="del" method="post"
                                              action="{{ route('companies.destroy' , $company->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Are you sure?')"
                                                    class="navi-link" type="submit">
                                                <span class="navi-icon"><i
                                                            class="flaticon2-rubbish-bin"></i></span>
                                                <span class="navi-text">{{ trans('dashboard.Delete Company') }} </span>
                                            </button>
                                        </form>
                                        {{--<a href="javascript:{}" class="navi-link">--}}
                                        {{--<span class="navi-icon"><i--}}
                                        {{--class="flaticon2-rubbish-bin"></i></span>--}}
                                        {{--<span class="navi-text">{{ trans('dashboard.Delete Company') }} </span>--}}
                                        {{--</a>--}}
                                    </li>
                                    @endcan
                                    @can('Corporate Assignment')
                                    <li class="navi-item">
                                        <a href="{{ route('assign_company_to_representative') }}" class="navi-link">
                                    <span class="navi-icon"><i
                                                class="flaticon2-user-1"></i></span>
                                            <span class="navi-text">{{ trans('dashboard.Assign companies to a representative') }} </span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('TEAM SALES LEAD REPORT')
                                    <li class="navi-item">
                                        <a href="{{ route('companySalesTeamReports.show',$company->id) }}" class="navi-link">
                                    <span class="navi-icon"><i
                                                class="flaticon-graph"></i></span>
                                            <span class="navi-text">{{ trans('dashboard.TEAM SALES LEAD REPORT') }} </span>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-circle symbol-lg-75 border">
                                <img src="{{ $company->logo ? asset('storage/images/'.$company->logo) :  asset('dashboard/assets/media/logo-default.svg')}}"
                                     alt="image">
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="{{ route('companies.show' , $company->id) }}"
                               class="text-dark font-weight-bold text-hover-primary font-size-h6 mb-0">
                                {{ $company->name }}
                            </a>
                            <span class="text-muted font-weight-bold">
                                {{--RANIA--}}
                                {{--data-name :: IS ATT TO CARRY COMPANY NAME TO PASS IT TO MODAL--}}
                                {{--data-img-url :: IS ATT TO CARRY BUSINESS CARD IMAGE TO PASS IT TO MODAL--}}

                                @if($company->first_business_card)
                                    <a class="business_card" data-toggle="modal"
                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->first_business_card) }}">
                                        <img style="width: 60px;height: 30px;"
                                             src="{{ asset('storage/images/'.$company->first_business_card) }}">
                                    </a>
                                @endif

                                @if($company->second_business_card)
                                    <a class="business_card" data-toggle="modal"
                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->second_business_card) }}">
                                        <img style="width: 60px;height: 30px;"
                                             src="{{ asset('storage/images/'.$company->second_business_card) }}">
                                    </a>
                                @endif

                                @if($company->third_business_card)
                                    <a class="business_card" data-toggle="modal"
                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->third_business_card) }}">
                                        <img style="width: 60px;height: 30px;"
                                             src="{{ asset('storage/images/'.$company->third_business_card) }}">
                                    </a>
                                @endif
                            </span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->

                    <!--begin::Info-->
                    <div class="mb-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Contact Information') }}
                                :</span>
                            <a href="javascript:;"
                               class="text-hover-primary phone">{{ $company->phone ? $company->phone : '-' }}</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Number of Employees') }}
                                : </span>
                            <span class=" text-hover-primary">{{ $company->num_of_employees ? $company->num_of_employees : '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Company Location') }}
                                :</span>
                            @if($company->location)
                                <a target="_blank" href="{{ $company->location }}">
                                    <span class="text-muted font-weight-bold">
                                        <i class="fas far fa-compass text-primary fa-spin"></i>
                                        {{ $company->city ? $company->city->name : '' }}
                                    </span>
                                </a>

                            @elseif($company->city)
                                <a target="_blank" href="javascript:;">
                                    <span class="text-muted font-weight-bold">
                                    {{ $company->city->name }}
                                    </span>
                                </a>
                            @else
                                -
                            @endif

                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Company Type') }}
                                :</span>
                            <span class="text-muted font-weight-bold">{{ $company->subSector ? $company->subSector->name : '-' }}</span>
                        </div>
                        {{--@if($company->company_representative_name)--}}
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Representative name') }}
                                    :</span>

                                <span title="{{ count($company->representative) ? (app()->getLocale() == 'ar' ? $company->representative[0]->name : $company->representative[0]->name_en) : '' }}" class="text-muted font-weight-bold">
                                    {{--{{ count($company->representative) ? \Illuminate\Support\Str::limit($company->representative[0]->name , 150, $end = '.') : '-' }}--}}
                                    {!! count($company->representative) ? (app()->getLocale() == 'ar' ? Str::limit($company->representative[0]->name, 15) : Str::limit($company->representative[0]->name_en, 15) )  : '-' !!}
                                </span>
                            </div>
                        {{--@endif--}}
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Communication Type') }}:</span>
                            <span class="text-muted font-weight-bold">
                                @if($company->email)
                                    <a class="md-effect sociall" data-toggle="modal"
                                       href="#btnMail-2863"
                                       data-effect="md-flipHor" req_id="1248">
                                        <img class="img-responsive"
                                             src="{{ asset('dashboard/assets/media/mail.png') }}">
                                    </a>
                                @endif

                                @if($company->twitter)
                                    <a class="sociall" href="{{ $company->twitter }}"
                                       target="_blank">
                                        <img class="img-responsive"
                                             src="{{ asset('dashboard/assets/media/twit.png') }}">
                                    </a>
                                @endif

                                @if($company->linkedin)
                                    <a class="sociall" href="{{ $company->linkedin }}"
                                       target="_blank">
                                        <img class="img-responsive"
                                             src="{{ asset('dashboard/assets/media/linked.png') }}">
                                    </a>
                                @endif
                                @if($company->whatsapp)
                                    <a class="sociall"
                                       href="https://api.whatsapp.com/send?phone=+{{ $company->whatsapp }}&amp;text=Hi,"
                                       target="_blank">
                                        <img class="img-responsive"
                                             src="{{ asset('dashboard/assets/media/whats.png') }}">
                                    </a>
                                @endif

                                @if(!$company->email && !$company->twitter && !$company->linkedin && !$company->whatsapp)
                                    -
                                @endif
                            </span>
                        </div>
                    </div>
                    <!--end::Info-->

                    <div class="separator separator-dashed mt-1 mb-1"></div>

                    <div class="form-group mb-0">
                        <div class="col-form-label">
                            <div class="checkbox-inline company_Card">
                                {{--RANIA--}}
                                {{--data-id :: ATT TO ADD company_id IN INPUT FIELD--}}
                                {{--class confirm_interview_checked :: CLASS TO CALL THE INPUT FIELD IN JS--}}
                                @can('Confirm Connection')
                                    <label class="checkbox checkbox-success">
                                        <input class="confirm_connected_checked" data-id="{{ $company->id }}" value="1"
                                               {{ count($company->representative) ? $company->representative[0]->pivot->confirm_connected == 1 ? 'checked' : ' ' : ' '}}
                                               {{ count($company->representative) ? $company->representative[0]->pivot->confirm_connected == 1 && $company->representative[0]->pivot->confirm_connected_user_id != auth()->id() ? 'disabled' : ' ' : ' ' }}
                                               type="checkbox" name="confirm_connected" />
                                        <span></span>
                                        {{ trans('dashboard.Confirm Connection') }}
                                    </label>
                                @endcan

                                <label class="checkbox checkbox-success">
                                    <input class="confirm_interview_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_interview"
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_interview == 1 ? 'checked' : '' : ''}}
                                            {{ count($company->companyMeetings) ? '' : 'disabled' }}
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_interview == 1 && $company->representative[0]->pivot->confirm_interview_user_id != auth()->id() ? 'disabled' : '' : ''}}/>
                                    <span></span>
                                    {{ trans('dashboard.Confirm Interview') }}
                                </label>
                                @can('Confirm Need')
                                <label class="checkbox checkbox-success">
                                    <input class="confirm_need_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_need"
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_need == 1 ? ' checked' : '' : ''}}
                                            {{ count($company->companyNeeds) ? '' : 'disabled' }}
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_need == 1 && $company->representative[0]->pivot->confirm_need_user_id != auth()->id() ? 'disabled' : '' : ''}}/>
                                    <span></span>
                                    {{ trans('dashboard.Confirm Need') }}
                                </label>
                                @endcan
                                @can('Confirm Contract')
                                <label class="checkbox checkbox-success">
                                    <input class="confirm_contract_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_contract"
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_contract == 1 ? ' checked' : '' : ''}}
                                            {{ count($company->representative) ? $company->representative[0]->pivot->confirm_contract == 1 && $company->representative[0]->pivot->confirm_contract_user_id != auth()->id() ? 'disabled' : '' : ''}}/>
                                    <span></span>{{ trans('dashboard.Confirm Contract') }}
                                </label>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>

    @endforeach
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> {{ $data['companies']->links() }}</div>






