@foreach ($seeker_skills as $skill)
    @include('partials.findSeekers.skill',['skill'=>$skill])
@endforeach
