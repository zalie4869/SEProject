var month_data = [
  {"elapsed": "มกราคม", "value": 0},
  {"elapsed": "กุมภาพันธ์", "value": 24},
  {"elapsed": "มีนาคม", "value": 3},
  {"elapsed": "เมษายน", "value": 12},
  {"elapsed": "พฤษภาคม", "value": 13},
  {"elapsed": "มิถุนายน", "value": 22},
  {"elapsed": "กรกฎาคม", "value": 5},
  {"elapsed": "สิงหาคม", "value": 26},
  {"elapsed": "กันยายน", "value": 12},
  {"elapsed": "ตุลาคม", "value": 19},
  {"elapsed": "พฤศจิกายน", "value": 19},
  {"elapsed": "ธันวาคม", "value": 19}
];

Morris.Line({
  element: 'graph1',
  data: month_data,
  xkey: 'elapsed',
  ykeys: ['value'],
  labels: ['value'],
  parseTime: false
});

Morris.Line({
  element: 'graph2',
  data: month_data,
  xkey: 'elapsed',
  ykeys: ['value'],
  labels: ['value'],
  parseTime: false
});