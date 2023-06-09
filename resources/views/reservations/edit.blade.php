@extends("layouts.app")

@section("content")

<form class="w-100" method="PUT" action="{{ $route }}" enctype="multipart/form-data">
@csrf
    <h1 class="my-5 titulo fs-1">{{ $title }}</h1>
    <div class="borde"></div>
    <div class="mt-5 mx-auto row justify-content-center w-25">
        <label class="block uppercase tracking-wide text-light text-xs font-bold my-3" for="activity_id">
            {{ __("Actividad") }}
        </label>
        <select name="activity_id" id="activity_id">
            @forelse($activities as $act)
                <option value="{{ $act->id }}">{{ $act->name }}</option>
            @empty
                <option value="none">{{ ("No hay actividades disponibles.") }}</option>
            @endforelse
        </select>
        @error("activity")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
        @enderror
        <label class="block uppercase tracking-wide text-light text-xs font-bold my-3" for="hour_id">
            {{ __("Hora") }}
        </label>
        <select name="hour_id" id="hour_id">
            @forelse($hour as $hour)
                @if ($hour->reserved_places==$hour->available_places)
                    <option value="{{ $hour->id }}" disabled>{{ $hour->day_of_the_week }} | {{ $hour->hour }} ({{ $hour->reserved_places }}/{{ $hour->available_places }})</option>
                @else 
                    <option value="{{ $hour->id }}">{{ $hour->day_of_the_week }} | {{ $hour->hour }} ({{ $hour->reserved_places }}/{{ $hour->available_places }})</option>
                @endif
            @empty
                <option value="none">{{ ("No hay horas disponibles para esta actividad.") }}</option>
            @endforelse
        </select>
        @error("activity")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
        @enderror
        <div class="md:flex md:items-center mt-5">
            <div class="md:w-1/3">
                <button class="shadow bg-yellow-400 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ $textButton }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>

    $(document).ready(function(){

        $("#activity_id").val(<?php echo $old_activity[0]->id ?>);

        $("#hour_id").val(<?php echo $old_hour->id ?>);

        $("#activity_id").on("change", () => {

            hours=<?php echo $hours ?>;
            save=[];

            for(i=0;i<hours.length;i++) {

                if(hours[i].act_id==$('#activity_id').val()) {

                    if(hours[i].reserved_places==hours[i].available_places) {

                        save[i]='<option value="'+i+'" disabled>'+hours[i].day_of_the_week+' | '+hours[i].hour+' ('+hours[i].reserved_places+'/'+hours[i].available_places+')</option>';

                    } else {

                        save[i]='<option value="'+i+'">'+hours[i].day_of_the_week+' | '+hours[i].hour+' ('+hours[i].reserved_places+'/'+hours[i].available_places+')</option>';

                    }
                    

                }

            }

            $("#hour_id").empty();

            for(j=0;j<save.length;j++) {

                if(save[j])
                    $("#hour_id").append(save[j]);

            }

        });

    });

</script>

@endsection

