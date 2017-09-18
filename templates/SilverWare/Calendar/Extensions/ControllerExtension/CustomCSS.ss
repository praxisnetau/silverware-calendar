div.flatpickr-calendar .flatpickr-month {
  background: {$CalendarHighlightColor};
}

div.flatpickr-calendar .flatpickr-innerContainer {
  border-color: {$CalendarHighlightColor};
}

div.flatpickr-calendar.arrowTop::after {
  border-bottom-color: {$CalendarHighlightColor};
}

span.flatpickr-day.selected,
span.flatpickr-day.selected:hover,
span.flatpickr-day.selected:focus,
span.flatpickr-day.startRange
span.flatpickr-day.startRange:hover,
span.flatpickr-day.startRange:focus,
span.flatpickr-day.startRange.inRange,
span.flatpickr-day.startRange.inRange:hover,
span.flatpickr-day.startRange.inRange:focus,
span.flatpickr-day.endRange,
span.flatpickr-day.endRange:hover,
span.flatpickr-day.endRange:focus,
span.flatpickr-day.endRange.inRange,
span.flatpickr-day.endRange.inRange:hover,
span.flatpickr-day.endRange.inRange:focus,
span.flatpickr-day.nextMonthDay.startRange,
span.flatpickr-day.prevMonthDay.startRange,
span.flatpickr-day.nextMonthDay.endRange,
span.flatpickr-day.prevMonthDay.endRange,
span.flatpickr-day.nextMonthDay.selected,
span.flatpickr-day.nextMonthDay.selected:hover,
span.flatpickr-day.nextMonthDay.selected:focus,
span.flatpickr-day.prevMonthDayselected,
span.flatpickr-day.prevMonthDay.selected:hover,
span.flatpickr-day.prevMonthDay.selected:focus {
  background: {$CalendarHighlightColor};
  border-color: {$CalendarHighlightColor};
}

span.flatpickr-day.today,
span.flatpickr-day.today:hover,
span.flatpickr-day.today.inRange,
span.flatpickr-day.today.inRange:hover {
  border-color: {$CalendarHighlightColor};
}

div.flatpickr-calendar.showTimeInput.hasTime .flatpickr-time {
  border-color: {$CalendarHighlightColor};
}

div.flatpickr-calendar.showTimeInput.hasTime.noCalendar .flatpickr-time {
  border-top-color: {$CalendarHighlightColor};
}
