var data = [
{ y: '2014', a: 50},
{ y: '2015', a: 65},
{ y: '2016', a: 50},
{ y: '2017', a: 75},
{ y: '2018', a: 80},
{ y: '2019', a: 900},
{ y: '2020', a: 100},
{ y: '2021', a: 115},
{ y: '2022', a: 120},
{ y: '2023', a: 1455},
{ y: '2024', a: 160}
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