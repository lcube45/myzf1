<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    use Robo\Task\Base\loadShortcuts;

    function phpunit()
    {
        return $this->taskExec('vendor/bin/phpunit');
    }

    function phpcs()
    {
        return $this->taskExec('vendor/bin/phpcs application/');
    }
}
