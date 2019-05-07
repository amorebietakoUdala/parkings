<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\DTO\ParkingOcupationLineDTO;

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
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get parkings ocupation status",
     *  filters={
     *      {"name"="parking", "dataType"="string"},
     *  },
     *  statusCodes={
     *      200="Returned when successful",
     *      404={
     *        "Returned when parking is not found",
     *      }
     *  }
     * )
     * @QueryParam(name="parking")
     * @Get("/ocupation/")
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
        foreach ($data as $row) {
            $pol = ParkingOcupationLineDTO::createParkingOcupationFromData($row);
            $results[] = $pol;
        }
        $view = new View($results);

        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
