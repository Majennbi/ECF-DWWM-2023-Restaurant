<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-administrator',
    description: 'Create an administrator',
)]
class CreateAdministratorCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct('app:create-administrator');

    }
    protected function configure(): void
    {
        $this
            ->addArgument('full_name', InputArgument::OPTIONAL, 'Full Name')
            ->addArgument('email', InputArgument::OPTIONAL, 'Email')
            ->addArgument('password', InputArgument::OPTIONAL, 'Password');
            
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $io = new SymfonyStyle($input, $output);
        $fullName = $input->getArgument('full_name');
        if($fullName === null) {
            $question = new Question('Entrez le nom de l\'administrateur : ');
            $fullName = $helper->ask($input, $output, $question);
        }

        $email = $input->getArgument('email');
        if($email === null) {
            $question = new Question('Entrez l\'email de l\'administrateur : ');
            $email= $helper->ask($input, $output, $question);
        }

        $plainPassword = $input->getArgument('password');
        if($plainPassword === null) {
            $question = new Question('Entrez le mot de passe de l\'administrateur : ');
            $plainPassword = $helper->ask($input, $output, $question);
        }

        $user = new User();
        $user->setFullName($fullName);
        $user->setEmail($email);
        $user->setPlainPassword($plainPassword);
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('l\'administrateur a été créé avec succès !');

        return Command::SUCCESS;
    }
}
