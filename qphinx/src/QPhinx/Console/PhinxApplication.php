<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace QPhinx\Console;

use QPhinx\Console\Command\Breakpoint;
use QPhinx\Console\Command\Create;
use QPhinx\Console\Command\Init;
use QPhinx\Console\Command\ListAliases;
use QPhinx\Console\Command\Migrate;
use QPhinx\Console\Command\Rollback;
use QPhinx\Console\Command\SeedCreate;
use QPhinx\Console\Command\SeedRun;
use QPhinx\Console\Command\Status;
use QPhinx\Console\Command\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Phinx console application.
 *
 * @author Rob Morgan <robbym@gmail.com>
 */
class PhinxApplication extends Application
{
    /**
     * Initialize the Phinx console application.
     */
    public function __construct()
    {
        parent::__construct('Phinx by CakePHP - https://phinx.org.');

        $this->addCommands([
            new Init(),
            new Create(),
            new Migrate(),
            new Rollback(),
            new Status(),
            new Breakpoint(),
            new Test(),
            new SeedCreate(),
            new SeedRun(),
            new ListAliases(),
        ]);
    }

    /**
     * Runs the current application.
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input An Input instance
     * @param \Symfony\Component\Console\Output\OutputInterface $output An Output instance
     *
     * @return int 0 if everything went fine, or an error code
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        // always show the version information except when the user invokes the help
        // command as that already does it
        if (($input->hasParameterOption(['--help', '-h']) !== false) || ($input->getFirstArgument() !== null && $input->getFirstArgument() !== 'list')) {
            $output->writeln($this->getLongVersion());
            $output->writeln('');
        }

        return parent::doRun($input, $output);
    }
}
