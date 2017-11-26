var data = [
{ y: '1', a: 50},
{ y: '2', a: 65},
{ y: '3', a: 50},
{ y: '4', a: 75},
{ y: '5', a: 80},
{ y: '6', a: 900},
{ y: '7', a: 100},
{ y: '8', a: 115},
{ y: '9', a: 120},
{ y: '10', a: 1455},
{ y: '11', a: 160}
],
config = {
  data: data,
  xkey: 'y',
  ykeys: ['a'],
  labels: ['ยอดรวม'],
  fillOpacity: 0.6,
  hideHover: 'auto',
  behaveLikeLine: true,
  resize: true,
  pointFillColors:['#ffffff'],
  pointStrokeColors: ['black'],
  lineColors:['green']
};
config.element = 'area-chart';
Morris.Area(config);
// config.element = 'line-chart';
// Morris.Line(config);
// config.element = 'bar-chart';
// Morris.Bar(config);
// config.element = 'stacked';
// config.stacked = true;
// Morris.Bar(config);
// Morris.Donut({
//   element: 'pie-chart',
//   data: [
//   {label: "Friends", value: 30},
//   {label: "Allies", value: 15},
//   {label: "Enemies", value: 45},
//   {label: "Neutral", value: 10}
//   ]
// });