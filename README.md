# Templates
A collection of templates to be used for MDOQ functionality.

## Post Rollup Actions
`wget https://raw.githubusercontent.com/MDOQ-UK/Templates/main/post_roll_up_actions -O mdoq/post_roll_up_actions && chmod a+x mdoq/post_roll_up_actions`

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
