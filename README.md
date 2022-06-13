# Templates
A collection of templates to be used for MDOQ functionality.

## Post Rollup Actions

A full example script that can be used to configure Magento under every condition can be found [here](post_roll_up_actions)  
It can be installed on your project with:  
```bash
wget https://raw.githubusercontent.com/MDOQ-UK/Templates/main/post_roll_up_actions -O mdoq/post_roll_up_actions && chmod a+x mdoq/post_roll_up_actions
```

However we have some more streamlined / smaller examples in the [post_roll_up_actions_examples](post_roll_up_actions_examples) directory
- [configuration per instance type](post_roll_up_actions_examples/set_configuration) - configure Magento depending on the instance type. (Also includes disabling MFA for development environments only)

## Gitignore
To pull in the [MDOQ gitignore template](/gitignore/template) when an instance rolls up you can add the following to the `post_roll_up_actions` script (the "FINAL_STEP" part).

`curl -s https://raw.githubusercontent.com/MDOQ-UK/Templates/main/gitignore/updater.php | php`

This would make the script look something like:
``` php
...
        "$ARGUMENT_STEP_FINAL-$ARGUMENT_COMPARISON_AHEAD")
            set -xe
            # your code
            curl -s https://raw.githubusercontent.com/MDOQ-UK/Templates/main/gitignore/updater.php | php
            ;;
        "$ARGUMENT_STEP_FINAL-$ARGUMENT_COMPARISON_IDENTICAL")
            set -xe
            # your code
            curl -s https://raw.githubusercontent.com/MDOQ-UK/Templates/main/gitignore/updater.php | php
            ;;
        "$ARGUMENT_STEP_FINAL-$ARGUMENT_COMPARISON_BEHIND")
            set -xe
            # your code
            curl -s https://raw.githubusercontent.com/MDOQ-UK/Templates/main/gitignore/updater.php | php
            ;;
...
```
