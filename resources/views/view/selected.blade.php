<x-layout>
    <select id="year" name="year">
    @for ($year = $current->year - 5; $year <= $current->year + 2; $year++)
        <option value="{{ $year }}" @selected($year == $current->year)>
        {{ $year }}</option>
    @endfor
    </select>

    <select id="month" name="month">
    @for ($month = 1; $month <= 12; $month++)
        <option value="{{ $month }}" @selected($month == $current->month)>
        {{ $month }}</option>
    @endfor
    </select>

    <select id="day" name="day">
    @for ($day = 1; $day <= 31; $day++)
        <option value="{{ $day }}" @selected($day == $current->day)>
        {{ $day }}</option>
    @endfor
    </select>
</x-layout>
