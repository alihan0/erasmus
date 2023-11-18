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
                            <th scope="col">Cinsiyet</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlem</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($participants as $participant)
                              <tr>
                                <td>
                                    {{$participant->id}}
                                </td>
                                <td>
                                    {{$participant->name ?? "-"}}
                                </td>
                                <td>
                                    {{$participant->email ?? "-"}}
                                </td>
                                <td>
                                    {{$participant->phone ?? "-"}}
                                </td>
                                <td>
                                    @if ($participant->gender == 1)
                                        <span class="badge bg-primary">Erkek</span>
                                    @elseif($participant->gender == 2)
                                        <span class="badge bg-danger">Kadın</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($participant->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/participant/detail/{{$participant->id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Detaylar"><i class="fas fa-eye"></i></a>
                                    
                                    <a href="/participant/edit/{{$participant->id}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Düzenle"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Sil" onclick="removeParticipant({{$participant->id}})"><i class="fas fa-trash"></i></a>
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

@section('script')
    <script>
        function removeParticipant(id){
            axios.post('/participant/remove', {'id': id})
                .then(res => {
                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/participant');
                    }, 500);
                   } 
                });
        }
    </script>
@endsection