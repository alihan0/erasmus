@extends('master')

@section('title', 'Personeller')
    
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Personeller</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">İsim</th>
                            <th scope="col">E-posta</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlem</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($staffs as $staff)
                              <tr>
                                <td>
                                    {{$staff->id}}
                                </td>
                                <td>
                                    {{$staff->name ?? "-"}}
                                </td>
                                <td>
                                    {{$staff->email ?? "-"}}
                                </td>
                                <td>
                                    {{$staff->phone ?? "-"}}
                                </td>
                                <td>
                                    @if ($staff->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/staff/edit/{{$staff->id}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Düzenle"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Sil" onclick="removeStaff({{$staff->id}})"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection