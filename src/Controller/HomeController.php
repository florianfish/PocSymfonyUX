<?php
namespace App\Controller;

use App\Form\AutocompleteExempleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_charts')]
    public function charts(ChartBuilderInterface $chartBuilder): Response
    {
        // Chart with Charjs
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'CA by Months',
                    'backgroundColor' => 'rgb(54, 162, 235)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'data' => [2000, 1500, 3000, 2555, 3555, 4000, 4500],
                ],
            ],
        ]);

        return $this->render('home/charts.html.twig', [
            'controller_name' => 'HomeController',
            'chart' => $chart
        ]);
    }

    #[Route('/maps', name: 'app_maps')]
    public function maps(): Response
    {
        // Map
        $map = (new Map('default'))
            ->center(new Point(45.7534031, 4.8295061))
            ->zoom(6)

            ->addMarker(new Marker(
                position: new Point(45.7534031, 4.8295061),
                title: 'Lyon',
            ))
            ->addMarker(new Marker(
                position: new Point(48.112856, -1.6777926),
                title: 'Rennes',
            ))
            ->addMarker(new Marker(
                position: new Point(47.218371, -1.553621),
                title: 'Nantes',
            ))
            ->addMarker(new Marker(
                position: new Point(49.182863, -0.370679),
                title: 'Caen',
            ))
            ->addMarker(new Marker(
                position: new Point(	49.633731, -1.622137
            ),
                title: 'Cherbourg',
            ))
            ->addMarker(new Marker(
                position: new Point(43.7101728, 7.2619532),
                title: 'Nice',
            ))
            ->addMarker(new Marker(
                position: new Point(43.296482, 5.36978),
                title: 'Marseille',
            ))
            ->options((new LeafletOptions())
                ->tileLayer(new TileLayer(
                    url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    options: ['maxZoom' => 19]
                ))
            );

        return $this->render('home/maps.html.twig', [
            'controller_name' => 'HomeController',
            'map' => $map,            
        ]);
    }

    #[Route('/vuejs_components', name: 'app_vuejs')]
    public function vuejs(): Response
    {
        return $this->render('home/vuejs.html.twig', [
            'controller_name' => 'HomeController'      
        ]);
    }

    #[Route('/autocomplete', name: 'app_autocomplete')]
    public function autocomplete(): Response
    {
        ## https://symfony.com/bundles/ux-autocomplete/current/index.html
        $form = $this->createForm(AutocompleteExempleType::class);

        return $this->render('home/autocomplete.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }
}
