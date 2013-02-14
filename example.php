<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Igorw\Fab\FabOutputFormatterStyle;

require 'vendor/autoload.php';

$app = new Application();
$app
    ->register('foo')
    ->setDefinition(array(
        new InputArgument('bar', InputArgument::REQUIRED, 'Bar'),
    ))
    ->setDescription('Does foo with bar')
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $bar = $input->getArgument('bar');

        $output->writeln(sprintf('This is the foo for <info>%s</info>', $bar));
        $output->writeln(sprintf('<comment>%s</comment>', sha1($bar)));
    });

$input = new ArgvInput();

$output = new ConsoleOutput();
$output->setFormatter(new OutputFormatter(true, [
    'info'      => new FabOutputFormatterStyle(),
    'comment'   => new FabOutputFormatterStyle(),
]));

$app->run($input, $output);
