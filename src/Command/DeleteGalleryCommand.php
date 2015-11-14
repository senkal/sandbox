<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteGalleryCommand extends Command
{
    protected function configure()
    {
        $this->setName('namespace:gallery:delete')
            ->setDescription('Delete some stuff')
            ->addArgument(
                'galleryId',
                InputArgument::REQUIRED
            );
    }
    protected function execute(InputInterface $input, OutputInterface $outputInterface)
    {
        $deleteQty = 0;
        $galeryId = $input->getArgument('galeryId');
        $checkQ = mysql_query("SELECT * FROM galery WHERE galery_id='$galeryId' LIMIT 1")
        or die(mysql_error());

        while ($checkR = mysql_fetch_assoc($checkQ) ) {
            ...
            if (0 == $catCheckR[0]) {
                $updateQ = mysql_query("UPDATE categories SET galery=0 WHERE id='$catId' ")
                or die(mysql_error());
            }
            ++$deleteQty;
        }

        $message = sprintf('Deleted %d items', $deletedQty);
        $mail = mail('cron@example.com', 'Gallery delete statistics', $message);
    }
}

