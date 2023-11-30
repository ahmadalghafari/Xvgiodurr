{{$test = 0 ,$test2 = 0}}
@switch($test + $test2)
    @case(5)
        5
    @break
    @case(7)
        7
    @break
    @case(8)
        hi
    @break
    @default
    fuck
@endswitch
