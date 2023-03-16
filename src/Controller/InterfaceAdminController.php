<?php

namespace App\Controller;

use App\Repository\ReservationsRepository;
use PhpParser\Node\Stmt\Break_;
use Random\BrokenRandomEngineError;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Mapping\CascadingStrategy;

class InterfaceAdminController extends AbstractController
{
    #[Route('/interface/admin', name: 'app_interface_admin')]
    public function index(ReservationsRepository $reservationsRepository): Response
    {
        $lunch = 0;
        $diner = 0;
        $numberReservationsToday = 0;
        $array = [];

        /* GET DATES OF RESERVATION OF THE DAY */
        $date = date("d.m.y");
        $dataDate = $reservationsRepository->findBy([
            'dateofreservation' => '30.03.23', // SI OK REMPLACER 2.03.23 PAR $date
        ]);

        if (count($dataDate) > 0) {
            $numberReservationsToday = count($dataDate);
            /* ARRAY CONTENANT LES HEURES DU JOUR */
            foreach ($dataDate as $item) {
                $array[] = $item->getSlotoftheday();
            }
            /* 
            * 1) Parcourir le tableau et si $array[i] correspond à une heure, on incrémente la variable;
            */
            for ($i = 0; $i < count($array); $i++) {
                $array[$i] === '11:00' ? $lunch++ : null;
                $array[$i] === '12:00' ? $lunch++ : null;
                $array[$i] === '13:00' ? $lunch++ : null;
                $array[$i] === '14:00' ? $lunch++ : null;

                $array[$i] === '19:00' ? $diner++ : null;
                $array[$i] === '18:00' ? $diner++ : null;
                $array[$i] === '20:00' ? $diner++ : null;
                $array[$i] === '21:00' ? $diner++ : null;
                $array[$i] === '22:00' ? $diner++ : null;
                $array[$i] === '23:00' ? $diner++ : null;
            }
        } else {
            $numberReservationsToday = 0;
        }

        return $this->render('interface_admin/index.html.twig', [
            'numberReservationsToday' => $numberReservationsToday,
            'lunch' => $lunch,
            'diner' => $diner,
        ]);
    }
}
