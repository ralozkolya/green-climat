<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="900" height="712" viewBox="0 0 941 744">
<defs>
    <style>
      .circle {
        fill: #fff;
        stroke-width: 8px;
        stroke: url(#green);
        filter: url(#shadow);
      }
      .path {
        fill: none;
        stroke-width: 8px;
        stroke: url(#yellow);  
      }
    </style>
    <linearGradient id="green" x1="0%" y1="50%" x2="100%" y2="50%">
      <stop offset="0" stop-color="#7dd579"/>
      <stop offset="1" stop-color="#2cba42"/>
    </linearGradient>
    <linearGradient id="yellow" x1="0%" y1="50%" x2="100%" y2="50%">
      <stop offset="0" stop-color="#b1b1b1"/>
      <stop offset="1" stop-color="#f1c40f"/>
    </linearGradient>
    <filter id="shadow" width="200" height="200">
      <feOffset result="offOut" in="SourceAlpha" dx="0" dy="1" />
      <feFlood result="flood" flood-opacity="0.3"/>
      <feGaussianBlur result="blurOut" in="offOut" stdDeviation="2" />
      <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
    </filter>
  </defs>
  <path class="path" d="M106,105
    A390,400
    45 1,0
    830,105"/>
  <g transform="translate(106,105)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('heating'); ?></text>
  </g>
  <g transform="translate(106,415)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('conditioning'); ?></text>
  </g>
  <g transform="translate(311,621)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('ventilation'); ?></text>
  </g>
  <g transform="translate(623,621)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('drainage'); ?></text>
  </g>
  <g transform="translate(830,415)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('canalisation'); ?></text>
  </g>
  <g transform="translate(830,105)">
    <circle class="circle" r="95"/>
    <text class="circle-text" dy="12" text-anchor="middle"><?php echo lang('water_systems'); ?></text>
  </g>
</svg>
