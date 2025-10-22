<?php

$config = include 'app/etc/env.php';

if(!isset($config['system'])) {
    $config['system'] = [];
}
if(!isset($config['system']['default'])) {
    $config['system']['default'] = [];
}
if(!isset($config['system']['default']['csp'])) {
    $config['system']['default']['csp'] = [];
}
if(!isset($config['system']['default']['csp']['policies'])) {
    $config['system']['default']['csp']['policies'] = [];
}
if(!isset($config['system']['default']['csp']['policies']['storefront'])) {
    $config['system']['default']['csp']['policies']['storefront'] = [];
}
$hosts = [
    '*.mdoq.io',
    '*.mdoq.dev'
];
$policies = [
    'mdoq-scripts' => 'script-src',
    'mdoq-frames' => 'frame-src',
    'mdoq-frame-ancestors' => 'frame-ancestors',
    'mdoq-img-src' => 'img-src',
    'mdoq-style-src' => 'style-src',
    'mdoq-connect-src' => 'connect-src',
    'mdoq-font-src' => 'font-src',
    'mdoq-form-action' => 'form-action'
];
foreach ($policies as $key => $policyId) {
    $config['system']['default']['csp']['policies']['storefront'][$key] = [
        'policy_id' => $policyId,
        'hosts' => $hosts
    ];
}
function var_export_short($data)
{
    $dump = var_export($data, true);

    $dump = preg_replace('#(?:\A|\n)([ ]*)array \(#i', '[', $dump); // Starts
    $dump = preg_replace('#\n([ ]*)\),#', "\n$1],", $dump); // Ends
    $dump = preg_replace('#=> \[\n\s+\],\n#', "=> [],\n", $dump); // Empties

    if (gettype($data) == 'object') { // Deal with object states
        $dump = str_replace('__set_state(array(', '__set_state([', $dump);
        $dump = preg_replace('#\)\)$#', "])", $dump);
    } else { 
        $dump = preg_replace('#\)$#', "]", $dump);
    }

    return $dump;
}

file_put_contents('app/etc/env.php', '<?php'.PHP_EOL.'return ' . var_export_short($config) . ';');