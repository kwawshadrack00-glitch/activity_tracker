@props(['width' => '40px', 'height' => '40px'])

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" style="width: {{ $width }}; height: {{ $height }};">
  <defs>
    <!-- Background Gradient -->
    <linearGradient id="bgGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#4F46E5" />
      <stop offset="100%" stop-color="#7C3AED" />
    </linearGradient>

    <!-- Subtle Drop Shadow -->
    <filter id="softShadow" x="-10%" y="-10%" width="120%" height="120%">
      <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#000000" flood-opacity="0.2" />
    </filter>
  </defs>

  <!-- Background Base -->
  <rect x="50" y="50" width="400" height="400" rx="90" fill="url(#bgGrad)" filter="url(#softShadow)" />

  <!-- Target Ring (Activity Base) -->
  <circle cx="250" cy="250" r="110" fill="none" stroke="#FFFFFF" stroke-opacity="0.25" stroke-width="20" />

  <!-- Active Pulse Accent Segment -->
  <path d="M 250 140 A 110 110 0 0 1 360 250" fill="none" stroke="#34D399" stroke-width="20" stroke-linecap="round" />

  <!-- Clean Bold Checkmark -->
  <path d="M 185 255 L 230 300 L 320 200" 
        fill="none" 
        stroke="#FFFFFF" 
        stroke-width="28" 
        stroke-linecap="round" 
        stroke-linejoin="round" />
</svg>

