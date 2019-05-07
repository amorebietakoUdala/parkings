<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\DTO\ParkingOcupationLineDTO;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Description of RestController.
 *
 * @author ibilbao
 */

/**
 * @Route("/api")
 */
class APIController extends AbstractFOSRestController
{
    /**
     * This API returns the parking occupation status for Amorebieta-Etxano
     * parkings. The response can be filtered with parking parameter through
     * parking name to get only the results for that parking.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get parkings occupation status",
     *  filters={
     *      {"name"="parking", "dataType"="string","pattern" = "dsfsdfdsf"},
     *  },
     *  statusCodes={
     *      200="Returned when successful",
     *      404={
     *        "Returned when parking is not found",
     *      }
     *  }
     * )
     * @QueryParam(name="parking")
     * @Get("/occupation/")
     */
    public function getActivitiesAction(\FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher)
    {
        $em = $this->getDoctrine()->getManager();
        $parking = $paramFetcher->get('parking');
        $query = $em->createQuery(
            '
				SELECT P.idParking id,P.nombre nombre,C.status status,P.aforo aforo,C.ocupacion ocupacion
				FROM AppBundle:Parking As P, AppBundle:Clienteparkingsweb As C
				WHERE P.idParking=C.idParking
				GROUP BY P.idParking
				ORDER BY P.orden
			'
        );
        if ('' !== $parking) {
            $query = $em->createQuery(
                '
					SELECT P.idParking id,P.nombre nombre,C.status status,P.aforo aforo,C.ocupacion ocupacion
					FROM AppBundle:Parking As P, AppBundle:Clienteparkingsweb As C
					WHERE P.idParking=C.idParking
					AND P.nombre = :nombre
					GROUP BY P.idParking
					ORDER BY P.orden
				'
            );
            $query->setParameter('nombre', $parking);
        }
        $data = $query->getResult();
        $count = count($data);
        if ($count > 0) {
            foreach ($data as $row) {
                $pol = ParkingOcupationLineDTO::createParkingOcupationFromData($row);
                $results[] = $pol;
            }
            $view = new View($results);

            return $this->get('fos_rest.view_handler')->handle($view);
        } else {
            return new JsonResponse('Parking not found', 404);
        }
    }
}
