@extends('master')

@section('title', 'Personeller')
    
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Yeni Personel</h4>
                    
                    <form action="javascript:void(0)" id="staffForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="name"  name="name" value="{{$staff->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="text" class="form-control" id="email"  name="email" value="{{$staff->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="phone"  name="phone" value="{{$staff->phone}}">
                        </div>
                        <button type="submit" class="btn btn-primary float-end" onclick="updateStaff({{$staff->id}})"><i class="fas fa-save"></i> Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateStaff(id){
            axios.post('/staff/update', $('#staffForm').serialize() + '&id=' + id)
                .then(res => {

                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/staff');
                    }, 500);
                   } 
                });
        }
    </script>
@endsection